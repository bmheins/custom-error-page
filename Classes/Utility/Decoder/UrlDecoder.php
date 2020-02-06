<?php
declare(strict_types = 1);

namespace Bitmotion\CustomErrorPage\Utility\Decoder;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 Cyril Janody <cyril.janody@fsg.ulaval.ca>, FSG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use DmitryDulepov\Realurl\Decoder\UrlDecoder as UrlDecoderBase;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class contains URL decoder for the RealURL. It is singleton because the
 * same instance must run in two different hooks.
 */
class UrlDecoder extends UrlDecoderBase implements SingletonInterface
{
    /**
     * Decodes the URL. This function is called from
     * \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::checkAlternativeIdMethods()
     *
     * @param array                        $params
     */
    public function decode(array $params)
    {
        if ($params['pObj'] instanceof \Bitmotion\CustomErrorPage\Controller\TypoScriptFrontendController) {
            $this->siteScript = $params['pObj']->siteScript;
        }
        parent::decodeUrl($params);
    }
}