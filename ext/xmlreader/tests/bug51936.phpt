--TEST--
Bug #51936 (Crash with clone XMLReader)
--SKIPIF--
<?php
extension_loaded("xmlreader") or die("skip requires xmlreader");
?>
--FILE--
<?php
echo "Test\n";

$xmlreader = new XMLReader();
$xmlreader->xml("<a><b/></a>");

$xmlreader->next();
$xmlreader2 = clone $xmlreader;
$xmlreader2->next();
?>
Done
--EXPECTF--
Test

Fatal error: Uncaught EngineException: Trying to clone an uncloneable object of class XMLReader in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
