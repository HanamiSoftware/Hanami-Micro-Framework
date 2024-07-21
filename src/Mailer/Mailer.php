<?php

namespace Hanami\Mailer {
    /**
     * Mailer short summary.
     *
     * Mailer description.
     *
     * @version 1.0
     * @author Francesco
     */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Hanami\Config\Config;

    class Mailer
    {
        private $mail;

        public function _construct()
        {
            $config = Config::getlnstance();

            $this->mail = new PHPMailer(true);
            $this->mail->isSMTP();
            $this->mail->Host = $config->get('EMAIL_HOST');
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $config->get('EMAIL_USER');
            $this->mail->Password = $config->get('EMAIL_PASS');
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = $config->get('EMAIL_PORT');
            $this->mail->setFrom($config->get('EMAIL_FROM'));
        }


        public function sendMail($to, $subject, $body)
        {
            try {
                $this->mail->addAddress($to);
                $this->mail->isHTML(true);
                $this->mail->Subject = $subject;
                $this->mail->Body = $body;

                $this->mail->send();
            } catch (Exception $e) {
                throw new \Exception("Message could not be sent. Mailer Error:
{$this->mail->ErrorInfo}");
            }
        }
    }

}