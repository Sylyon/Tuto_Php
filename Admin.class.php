<?php
include_once('Member.class.php');

class Admin extends Member
{
	private $color;
	/**
	 * Constructor
	 *
	 * @param
	 * @param
	 * @param
	 * @param
	 * @param
	 */
	public function __construct($name,$email,$sign,$color)
	{
		parent::__construct($name,$email,$sign);
		$this->color = $color;
	}
    /**
     * Gets the value of color.
     *
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets the value of color.
     *
     * @param mixed $color the color
     *
     * @return self
     */
    private function _setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
?>