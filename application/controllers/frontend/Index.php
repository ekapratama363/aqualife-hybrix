<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

class Index extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        // $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('frontend/Home_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['header'] = $this->Home_model->getDataBanner();
        $data['categories'] = $this->Home_model->getDataCategories();
        $data['categories_mobile'] = $this->Home_model->getDataCategories();
        $data['about'] = $this->Home_model->getDataAbout();
        $data['about_detail'] = $this->Home_model->getDataAboutDetail();
        $data['service'] = $this->Home_model->getDataService();
        $data['news'] = $this->Home_model->getDataNews();
        $data['reviews'] = $this->Home_model->getDataReview();
        $data['faq'] = $this->mappingFaqs($this->Home_model->getDataFaq());
        $data['companies_sosmed'] = $this->Home_model->getSocialMedia();
        
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/home/index');
        $this->load->view('frontend/_partials/footer');
    }

    private function mappingFaqs($faqs)
    {
        $dataFaq = [];
        foreach($faqs ?? [] as $faq) {
            $dataFaq[] = [
                'question' => $faq->title,
                'answer' => $faq->description,
            ];
        }

        return $dataFaq;
    }

    public function simpan_ajax() 
    { 
        $your_name = $this->input->post('your-name', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone_number = $this->input->post('phone-number', TRUE);
        $masalah = $this->input->post('masalah', TRUE);
        $type = $this->input->post('type', TRUE);

        if($your_name != '')
        {
            $user_email = 'mits.aqualife@gmail.com';
            $ip_address = '';  
        }
        else
        {
            $user_email = 'arghasatriyaa123@gmail.com';
            $ip_address = $this->input->ip_address(); 
        }

        
        
        if($type == '2')
        {
            $category = 'Water Treatment Plant';
        }
        else if($type == '3')
        {
            $category = 'Water Softener';
        }
        else if($type == '4')
        {
            $category = 'RO-Drinking Wate';
        }
        else
        {
            $category = '-';
        }

        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = 'info@aqualife-indonesia.com'; // user email
        $mail->Password = '@Aqulife@2025'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'mail.aqualife-indonesia.com';
        $mail->Port = '465';

        $mail->Timeout = 60; // timeout pengiriman (dalam detik)
        $mail->SMTPKeepAlive = true; 

        $mail->setFrom('info@aqualife-indonesia.com', ''); // user email
        $mail->addReplyTo('info@aqualife-indonesia.com', ''); //user email

        // Add a recipient
        $mail->addAddress($user_email); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'We have new request from customer!'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        $mail->setFrom('info@aqualife-indonesia.com', ''); // user email
        $mail->addReplyTo('info@aqualife-indonesia.com', ''); //user email
        // $mail->addCC('satriya@sinarsyno.com', ''); //user email

        // Add a recipient
        $mail->addAddress($user_email); //email tujuan pengiriman email
        // $mail->addAddress('satriya223@gmail.com');

        // Email subject
        $mail->Subject = 'We have new request from customer!'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

// Email body content
$htmlContent = '
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>

        <style>
            @media only screen and (max-width: 620px) 
            {
                table.body h1 
                {
                    font-size: 28px !important;
                    margin-bottom: 10px !important;
                }

                table.body p,
                table.body ul,
                table.body ol,
                table.body td,
                table.body span,
                table.body a 
                {
                    font-size: 16px !important;
                }

                table.body .wrapper,
                table.body .article 
                {
                    padding: 10px !important;
                }

                table.body .content 
                {
                    padding: 0 !important;
                }

                table.body .container 
                {
                    padding: 0 !important;
                    width: 100% !important;
                }

                table.body .main 
                {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important;
                }

                table.body .btn table 
                {
                    width: 100% !important;
                }

                table.body .btn a 
                {
                    width: 100% !important;
                }

                table.body .img-responsive 
                {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important;
                }
            }

            @media all 
            {
                .ExternalClass 
                {
                    width: 100%;
                }

                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div 
                {
                    line-height: 100%;
                }

                .apple-link a 
                {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important;
                }

                #MessageViewBody a 
                {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                }

                .btn-primary table td:hover 
                {
                    background-color: #34495e !important;
                }

                .btn-primary a:hover 
                {
                    background-color: #34495e !important;
                    border-color: #34495e !important;
                }
            }
        </style>
    </head>

    <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
        
            <tr>
                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                    <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

                            <!-- START MAIN CONTENT AREA -->
                            <tr>
                                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                        <tr>
                                            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; color:black;" valign="top">
                                                <div style="text-align:center;margin-bottom:10px;">
                                                    <a href="https://ibb.co.com/PGckzypy"><img src="https://i.ibb.co/PGckzypy/logo.png" width="80px" border="0"></a>
                                                </div>
                                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 25px;">Dear Aqualife,</p>
                                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">We accept solution requests from our potential customers through the website.</p>
                                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Please pay attention carefully :</p>

                                                <table width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" style="font-family: sans-serif; font-size: 14px;">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Name </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $your_name .'</p></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Location </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $address .'</p></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Email Address </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $email .'</p></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Phone Number </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $phone_number .'</p></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Concerns </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $masalah .'</p></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;">Interested Product </p></td>
                                                                            <td><p style="font-family: sans-serif; font-size: 14px; font-weight: normal;"> : '. $category .'</p></td>
                                                                        </tr>

                                                                        '. $ip_address .'
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>


                        <!-- END MAIN CONTENT AREA -->
                        </table>
                        <!-- END CENTERED WHITE CONTAINER -->

                        <!-- START FOOTER -->
                        <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                <tr>
                                    <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                                        Powered by Aqualife Indonesia
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- END FOOTER -->

                    </div>
                </td>

                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
            
            </tr>
        </table>
    </body>
</html>            
'; 
                                
        $mail->Body = $htmlContent;

        $date_now = date('Y-m-d');
        $time_now = date('H:i:s');

        if(!$mail->send())
        {
            $this->db->query("INSERT 
                                status_email
                            SET
                                status = 'failed',
                                date = '$date_now',
                                time = '$time_now',
                                reason = 'gagal'
                        ");
            die();
        }
        else
        {
            $this->db->query("INSERT 
                                status_email
                            SET
                                status = 'sent',
                                date = '$date_now',
                                time = '$time_now',
                                reason = 'sukses'
                        ");
        }

        $data = array(
            'first_name' => $your_name,
            'address' => $address,
            'email' => $email,
            'phone' => $phone_number,
            'issue' => $masalah,
            'created_at' => date("Y-m-d H:i:s"),
            'category_id' => $type,
            // 'water_treatment' => $wt,
            // 'water_softener' => $ws,
            // 'drinking_water' => $dw,
        );

        $this->db->insert('orders', $data);

        echo '<script>alert("You have successfully submit this Record!");window.location = "'.base_url().'frontend/Index"</script>';
    }
}

