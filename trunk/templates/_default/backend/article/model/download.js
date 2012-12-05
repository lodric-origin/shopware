/**
 * Shopware 4.0
 * Copyright © 2012 shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 *
 * Shopware Model - Article backend module.
 *
 * shopware AG (c) 2012. All rights reserved.
 *
 * @link http://www.shopware.de/
 * @date 2012-02-20
 * @license http://www.shopware.de/license
 * @package Article
 * @subpackage Detail
 */
//{block name="backend/article/model/download"}
Ext.define('Shopware.apps.Article.model.Download', {

    /**
    * Extends the standard Ext Model
    * @string
    */
    extend: 'Ext.data.Model',

    /**
     * Fields array which contains the model fields
     * @array
     */
    fields: [
		//{block name="backend/article/model/download/fields"}{/block}
        { name: 'id', type: 'int' },
        { name: 'articleId', type: 'int' },
        { name: 'name', type: 'string' },
        { name: 'file', type: 'string' },
        { name: 'size', type: 'float' }
    ],
    associations: [
        { type: 'hasMany', model: 'Shopware.apps.Article.model.DownloadAttribute', name: 'getAttributes', associationKey: 'attribute'}
    ]
});
//{/block}
