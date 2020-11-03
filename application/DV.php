<?php
//Class DV - Dashboard View

abstract class DV
{

	protected function retrieveLookup($table_name, $flag)
	{
		$ret = new SQLController;

		return $ret->sqlFlag($table_name, $flag);
	}

	private function displayHeader()
	{
		include('system/templates/header.php');
		include('system/templates/sidebar.php');
		include('system/templates/topbar.php');
	} //displayHeader() function ends here - note by AJ

	abstract protected function displayBody();

	public function display()
	{
		$this->displayHeader();
		$this->displayBody();
		$this->displayFooter();
	}

	private function displayFooter()
	{
?>
		</div>
		</div>
		<div class="clear">
		</div>
		</div>
		<div class="clear">
		</div>
		</body>
		<html>
<?php
	} //end of displayFooter() function - note by AJ
} //end of DV class - note by AJ
?>