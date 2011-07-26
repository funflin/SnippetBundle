<?php
namespace Facebes\SnippetBundle\Tests\Entity;

use Facebes\SnippetBundle\Entity\Language;


class LanguageEntityTest extends \PHPUnit_Framework_TestCase
{
  public function __construct()
  {
    $this->lang = new Language();
  }

  public function testgetFullPath()
  {
      $this->assertNull($this->lang->getFullPath());
  }
}