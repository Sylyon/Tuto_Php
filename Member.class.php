<?php
class Member
{
	private $name;
	private $email;
	private $sign;
	private $active;
	/**
	* Constructor
	*
	*
	 * @author Bastien DROUOT
	 * @param  $name            The name
	 * @param  $email          The email
	 * @param  $sign            The signature
	 */
	public function __construct($name,$email,$sign)
	{
		$this -> name = $name;
		$this -> email = $email;
		$this -> sign = $sign;
		$this -> active = true;
	}

	/**
	 * Destroy
	 * @author  Bastien DROUOT
	 */
	public function __destroy()
	{
		echo 'object destroy';
	}
	/**
	 * Send email to a member
	 *
	 * @author Bastien DROUOT
	 * @param  $title            The email's title
	 * @param  $message          The message include in the email
	 */
	public function sendEMail($title,$message)
	{
		mail($this -> email,$title,$message);
	}

	/**
	 * Bane a member
	 *
	 * @author  Bastien DROUOT
	 */
	public function bane()
	{
		$this -> active  = false;
		//$this -> sendEMail('Your BANE','Never see you');
	}
    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of sign.
     *
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * Sets the value of sign.
     *
     * @param mixed $sign the sign
     *
     * @return self
     */
    public function _setSign($sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Gets the value of active.
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param mixed $active the active
     *
     * @return self
     */
    private function _setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
