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
 */

/**
 * Shopware Backend - Tax store
 *
 * todo@all: Documentation
 */

//{block name="backend/config/store/detail/tax"}
Ext.define('Shopware.apps.Config.store.detail.Tax', {
	extend: 'Ext.data.Store',
	model : 'Shopware.apps.Config.model.form.Tax',
    remoteSort: true,
    remoteFilter: true,
    pageSize: 20,
    proxy: {
        type: 'ajax',
        url: '{url action=getValues name=tax}',
        api: {
            create: '{url action=saveValues name=tax}',
            update: '{url action=saveValues name=tax}',
            destroy: '{url action=deleteValues name=tax}'
        },
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});
//{/block}