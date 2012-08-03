<?php

namespace TokenReflection;

require_once __DIR__ . '/../bootstrap.php';

/**
 * @author Václav Šír
 */
class PropertyAnnotationTest extends Test
{
	
	public function testPropertyAnnotationAddsProperty()
	{
		$broker = $this->getBroker();
		$fileName = 'somehing.php';
		$source = '<?php

/**
 * @property stdClass $bar Description
 * @property-read string $xyz
 */
class Foo {
}
';
		$broker->processString($source, $fileName);
		
		$this->assertTrue($broker->hasClass('Foo'));
		$class = $broker->getClass('Foo');
		$this->assertTrue($class->hasProperty('bar'));
		$this->assertTrue($class->hasProperty('xyz'));
	}
	
}
