<?php
require './21/LinkNode.php';

class SingleLL
{
  public $head;
  public $tail;
  public  function __construct()
  {
    $this->head = NULL;
    $this->tail = NULL;
  }
  // Add new node at the end of linked list
  public  function insert($value)
  {
    // Create a new node
    $node = new LinkNode($value);
    if ($this->head == NULL) {
      $this->head = $node;
    } else {
      $this->tail->next = $node;
    }
    $this->tail = $node;
  }
  public  function isLoop()
  {
    if ($this->head == NULL) {
      return false;
    }
    $first = $this->head;
    $second = $this->head;
    while (
      $second != NULL &&
      $second->next != NULL &&
      $second->next->next != NULL
    ) {
      $first = $first->next;
      $second = $second->next->next;
      if ($first == $second) {
        return true;
      }
    }
    return false;
  }
  public static
  function main($args)
  {
    $sll = new SingleLL();
    $sll->insert(1);
    $sll->insert(2);
    $sll->insert(3);
    $sll->insert(4);
    $sll->insert(5);
    $sll->insert(6);
    printf("%s\n", $sll->isLoop() ? 1 : 0);

    $sll->tail->next = $sll->head->next;
    printf("%s\n", $sll->isLoop() ? 1 : 0);
  }
}
