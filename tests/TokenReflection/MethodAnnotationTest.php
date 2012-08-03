<?php

namespace TokenReflection;

require_once __DIR__ . '/../bootstrap.php';

/**
 * @author Václav Šír
 */
class MethodAnnotationTest extends Test
{
	
	public function testMethodAnnotationAddsMethod()
	{
		$broker = $this->getBroker();
		$fileName = 'somehing.php';
		$source = '<?php

/**
 * @method int bar()
 */
class Foo {
}
';
		$broker->processString($source, $fileName);
		
		$this->assertTrue($broker->hasClass('Foo'));
		$class = $broker->getClass('Foo');
		$this->assertTrue($class->hasMethod('bar'));
	}
	
}
