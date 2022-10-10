<?php

class User
{
    private $name;
    private $email;
    private $feedback;
    private $nameErr;
    private $emailErr;
    private $feedbackErr;

    /**
     * @param mixed $name
     */
    public function set_name($name)
    {
        if (!empty($name)){
            $name = trim($name ," #@");
            $name = htmlspecialchars($name);
            $this->name = $name;
        }else{
            $this->nameErr = "Name Field Is Required";
        }
    }

    /**
     * @return mixed
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * @param mixed $email
     */
    public function set_email($email)
    {
        if (!empty($email)):
            if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $this->email = $email;
            } else{
                $this->emailErr = "This Field Must Be An Email";
            }
        else:
            $this->emailErr = "Email Field Is Required";
        endif;
    }

    /**
     * @return mixed
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * @param mixed $feedback
     */
    public function set_feedback($feedback)
    {
        if (!empty($feedback)){
            $feedback = trim($feedback);
            $feedback = htmlspecialchars($feedback);
            $this->feedback = $feedback;
        }else{
            $this->feedbackErr = "Feedback Field Is Retried";
        }
    }

    /**
     * @return mixed
     */
    public function get_feedback()
    {
        return $this->feedback;
    }

    /**
     * @return mixed
     */
    public function get_name_err()
    {
        return $this->nameErr;
    }

    /**
     * @return mixed
     */
    public function get_email_err()
    {
        return $this->emailErr;
    }

    /**
     * @return mixed
     */
    public function get_feedback_err()
    {
        return $this->feedbackErr;
    }




}