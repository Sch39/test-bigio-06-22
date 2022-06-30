<?php 

class LinkNode
{
  public $data;
  public $next;
  public  function __construct($data)
  {
    $this->data = $data;
    $this->next = NULL;
  }
}
