<?php

namespace ContainerMAOqg3o;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_TranslationDebugService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.translation_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\console\\Command\\Command.php';
        include_once \dirname(__DIR__, 4).'\\vendor\\symfony\\framework-bundle\\Command\\TranslationDebugCommand.php';

        $container->privates['console.command.translation_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand(($container->services['translator'] ?? $container->getTranslatorService()), ($container->privates['translation.reader'] ?? $container->load('getTranslation_ReaderService')), ($container->privates['translation.extractor'] ?? $container->load('getTranslation_ExtractorService')), (\dirname(__DIR__, 4).'/translations'), (\dirname(__DIR__, 4).'/templates'), [0 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\validator/Resources/translations'), 1 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form/Resources/translations'), 2 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\security-core/Resources/translations')], [0 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\twig-bridge/Resources/views/Email'), 1 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\twig-bridge/Resources/views/Form'), 2 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\framework-bundle\\Command\\TranslationDebugCommand.php'), 3 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form\\Extension\\Core\\Type\\FileType.php'), 4 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form\\Extension\\Core\\Type\\ColorType.php'), 5 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form\\Extension\\Core\\Type\\TransformationFailureExtension.php'), 6 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form\\Extension\\Validator\\Type\\UploadValidatorExtension.php'), 7 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\form\\Extension\\Csrf\\Type\\FormTypeCsrfExtension.php'), 8 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\validator\\ValidatorBuilder.php'), 9 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\framework-bundle\\CacheWarmer\\TranslationsCacheWarmer.php'), 10 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\translation\\DataCollector\\TranslationDataCollector.php'), 11 => (\dirname(__DIR__, 4).'\\vendor\\symfony\\twig-bridge\\Extension\\TranslationExtension.php')]);

        $instance->setName('debug:translation');

        return $instance;
    }
}
