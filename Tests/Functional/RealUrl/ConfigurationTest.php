<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Tests\Functional\RealUrl;

use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use OliverKlee\Seminars\RealUrl\Configuration;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
final class ConfigurationTest extends FunctionalTestCase
{
    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/seminars'];

    private function getRealUrlConfigurationForSeminars(): string
    {
        $options = (array)$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'];

        return (string)$options['ext/realurl/class.tx_realurl_autoconfgen.php']['extensionConfiguration']['seminars'];
    }

    /**
     * Extracts the class name from something like '...->foo'.
     *
     * @param string $reference
     *
     * @return string class name
     */
    private function extractClassNameFromUserFunction(string $reference): string
    {
        $parts = \explode('->', $reference);

        return \array_shift($parts);
    }

    /**
     * Extracts the method name from something like '...->foo'.
     *
     * @param string $reference
     *
     * @return string method name
     */
    private function extractMethodNameFromUserFunction(string $reference): string
    {
        $parts = \explode('->', $reference);

        return \array_pop($parts);
    }

    /**
     * @test
     */
    public function autoConfigurationReferencesExistingClass()
    {
        $reference = $this->getRealUrlConfigurationForSeminars();
        $className = $this->extractClassNameFromUserFunction($reference);

        self::assertTrue(\class_exists($className));
        self::assertSame(Configuration::class, $className);
    }

    /**
     * @test
     */
    public function autoConfigurationReferencesExistingMethod()
    {
        $reference = $this->getRealUrlConfigurationForSeminars();
        $methodName = $this->extractMethodNameFromUserFunction($reference);

        self::assertTrue(\method_exists(new Configuration(), $methodName));
    }
}
