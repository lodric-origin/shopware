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
 * @category   Shopware
 * @package    UserManager
 * @subpackage View
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @version    $Id$
 * @author shopware AG
 */
//{namespace name=backend/newsletter_manager/view/components/article}
Ext.define('Shopware.apps.NewsletterManager.view.components.fields.ArticleType', {
    extend: 'Ext.form.field.ComboBox',
    alias: 'widget.newsletter-components-fields-article-type',
    name: 'article_type',

    /**
     * Snippets for the component
     * @object
     */
    snippets: {
        fields: {
            'article_type': '{s name=article/fields/article_type}Type of article{/s}',
            'empty_text': '{s name=article/fields/empty_text}Please select...{/s}'
        },
        store: {
            'selected_article': '{s name=article/store/selected_article}Selected article{/s}',
            'newcomer': '{s name=article/store/newcomer}Newcomer article{/s}',
            'topseller': '{s name=article/store/topseller}Topseller article{/s}',
            'random_article': '{s name=article/store/random_article}Random article{/s}'
        }
    },

    /**
     * Initiliaze the component.
     *
     * @public
     * @return void
     */
    initComponent: function() {
        var me = this;

        Ext.apply(me, {
            emptyText: me.snippets.fields.empty_text,
            fieldLabel: me.snippets.fields.article_type,
            displayField: 'display',
            valueField: 'value',
            queryMode: 'local',
            triggerAction: 'all',
            store: me.createStore()
        });

        me.callParent(arguments);
        me.on('change', me.onArticleSelectChange, me);
    },

    /**
     * Event listeners which triggers when the user changs the value
     * of the select field.
     *
     * @public
     * @event change
     * @param [object] field - Ext.form.field.ComboBox
     * @param [string] value - The selected value
     */
    onArticleSelectChange: function(field, value) {
        var me = this;

        // Terminate the article search field
        if(!me.articleSearch) {
            me.articleSearch = me.up('fieldset').down('newsletter-components-fields-article');
        }

        // Show/hide article search field based on selected entry
        me.articleSearch.setVisible(value !== 'selected_article' ? false : true);
    },

    /**
     * Creates a local store which will be used
     * for the combo box. We don't need that data.
     *
     * @public
     * @return [object] Ext.data.Store
     */
    createStore: function() {
        var me = this, snippets = me.snippets.store;

        return Ext.create('Ext.data.JsonStore', {
            fields: [ 'value', 'display' ],
            data: [{
                value: 'selected_article',
                display: snippets.selected_article
            }, {
                value: 'new',
                display: snippets.newcomer
            }, {
                value: 'top',
                display: snippets.topseller
            }, {
                value: 'random_article',
                display: snippets.random_article
            }]
        });
    }
});