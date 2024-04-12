<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// IMPORTANT - Replace the following line with your path to the escpos-php autoload script
//require_once 'C:\Users\Administrator.MYAAP\vendor\autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

class ReceiptPrint {

  private $CI;
  private $connector;
  private $printer;

  // TODO: printer settings
  // Make this configurable by printer (32 or 48 probably)
  private $printer_width = 32;

  function __construct()
  {
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->... 
  }

 /* function connect($ip_address, $port)
  {
    $this->connector = new NetworkPrintConnector($ip_address, $port);
    $this->printer = new Printer($this->connector);
  }*/
  function connect($user)
  {
    //$this->connector = new NetworkPrintConnector($user, 9100);
    $this->connector = new WindowsPrintConnector($user);
    $this->printer = new Printer($this->connector);
    
    
  }

  private function check_connection()
  {
    if (!$this->connector OR !$this->printer OR !is_a($this->printer, 'Mike42\Escpos\Printer')) {
      throw new Exception("Tried to create receipt without being connected to a printer.");
    }
  }

  public function close_after_exception()
  {
    if (isset($this->printer) && is_a($this->printer, 'Mike42\Escpos\Printer')) {
      $this->printer->close();
    }
    $this->connector = null;
    $this->printer = null;
    $this->emc_printer = null;
  }

  // Calls printer->text and adds new line
  private function add_line($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width) : $text;
    $this->printer->text($text."\n");
  }

  public function print_ticket_number($ticket,$typecat)
  {

    date_default_timezone_set('Asia/Manila');
    $today =  date('l, jS F Y g:ia');

    $this->check_connection();
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $this->add_line("Automobile Association\n");
    $this->add_line("of the Philippines");
    $this->add_line(); 
    $this->printer->selectPrintMode();
    $this->add_line();// blank line
    $this->add_line($today);
    $this->add_line(); // blank line
    $this->add_line("Please take the number and wait until your number is called.\n"); 
    $this->add_line();
    $this->add_line("Ticket No.");
    $this->add_line();
    $this->printer->setFont(Printer::FONT_A);
    $this->printer-> setTextSize(3,3);
    $this->add_line($ticket);
    $this->add_line();
	$this->printer->setFont(Printer::FONT_A);
    $this->printer-> setTextSize(2,2);
    $this->add_line($typecat);
    $this->add_line();
    $this->printer->cut(Printer::CUT_PARTIAL);
    $this->printer->close();
  }

  public function print_test_receipt($text = "")
  {

    $this->check_connection();
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $this->add_line("TESTING");
    $this->add_line("Receipt Print");
    $this->printer->selectPrintMode();
    $this->add_line(); // blank line
    $this->add_line($text);
    $this->add_line(); // blank line
    $this->add_line(date('Y-m-d H:i:s'));
    $this->printer->cut(Printer::CUT_PARTIAL);
    $this->printer->close();
  }

}