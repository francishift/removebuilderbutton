<?php

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;

class PlgSystemRemoveBuilderButton extends CMSPlugin
{
    /**
     * Evento onAfterRender: Modifica el contenido HTML antes de enviarlo al navegador.
     */
    public function onAfterRender()
    {
        // Verifica si estamos en el frontend
        $app = Factory::getApplication();
        if (!$app->isClient('site')) {
            return;
        }

        // Obtén el contenido del buffer HTML
        $buffer = $app->getBody();

        // Patrón para encontrar y eliminar el botón de YOOtheme
        $pattern = '/<a style="position: fixed!important" class="uk-position-medium uk-position-bottom-right uk-position-z-index uk-button uk-button-primary" href="[^"]*">[^<]*<\/a>/';

        // Reemplaza el botón con una cadena vacía
        $buffer = preg_replace($pattern, '', $buffer);

        // Establece el contenido modificado como el nuevo cuerpo
        $app->setBody($buffer);
    }
}

