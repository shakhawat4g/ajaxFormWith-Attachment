<?php
public function registration()
    {
        ajaxAuthorized();
        // recaptcha v3
        if (getSettingItem('RecaptchaStatusV3') == 'Enable') {
            $captcha = $this->input->post('g-recaptcha');
            if (!$captcha) {
                echo ajaxRespond('Fail', 'Please check the the captcha form.');
                exit;
            }
            $url          = "https://www.google.com/recaptcha/api/siteverify";
            $captcha_data = [
                'secret'   => getSettingItem('RecaptchaSecretKeyV3'),
                'response' => $captcha,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ];
            $options      = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($captcha_data)
                ]
            ];
            $context      = stream_context_create($options);
            $response     = file_get_contents($url, false, $context);
            $res          = json_decode($response, true);
            if ($res["success"] == false) {
                echo ajaxRespond('Fail', 'Please check the the captcha form.');
                exit;
            }
        }
        // recaptcha v3 end

        $post = $this->input->post('registration');

        // dd($post);
        $attach = isset($_FILES['file']) ? $_FILES['file']['name'] : false;
        if($attach) {
            $file_name = $this->uploadFile($_FILES['file'],'registration/cv/');   
            $temp_path = FCPATH . $file_name;
            $file_name = $_FILES['file']['name'];
        }
        if (isModuleExist('client')) {
            $lead_data         = $this->db->get_where('clients', ['email' => $post['email']])->row();
            $data['client_id'] = ($lead_data) ? $lead_data->id : 0;
        }

        $data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'ip'        => $this->input->ip_address(),
            'content'   => json_encode($post),
            'status'    => 'Unread'
        ];
        $this->db->insert('web_enquiry', $data);

        $options = [
            'id'         => 0,
            'email'      => $post['email'],
            'subject'    => 'Registration Application',
            'site_title' => $GLOBALS['ComName']
        ];
        sendMail('onSendRegMailToUser', $options);

        $options = [
            'id'                            => 0,
            'email'                         => getSettingItem('IncomingEmail'),
            'subject'                       => 'Registration',
            'name'                          => $post['name'],
            'surname'                       => $post['surname'],
            'sender_email'                  => $post['email'],
            'phone'                         => $post['phone'],
            'address'                       => $post['address'],
            'postcode'                      => $post['postcode'],
            'date_of_birth'                 => $post['date_of_birth'],
            'nationality'                   => $post['nationality'],
            'emergency_contact_name'        => $post['emergency_contact_name'],
            'emergency_contact_number'      => $post['emergency_contact_number'],
            'national_insurance_number'     => $post['national_insurance_number'],
            'utr_number'                    => $post['utr_number'],
            'name_of_bank'                  => $post['name_of_bank'],
            'account_holder_name'           => $post['account_holder_name'],
            'account_number'                => $post['account_number'],
            'sort_code'                     => $post['sort_code']
        ];
        $options['attach'] = [
            [
                'file' => $temp_path,
                'name' => $file_name
            ]
        ];

        echo sendMail('onSendRegMail', $options);
    }
    private function uploadFile($FILE, $path = 'uploads/registration/')
    {
        $handle = new \Verot\Upload\Upload($FILE);
        if ($handle->uploaded) {
            $handle->file_new_name_body = rand(10,999999999999999);
            $handle->process("{$path}");
            if ($handle->processed) {
                return stripslashes($handle->file_dst_pathname);
            }
        }
        return '';
    }