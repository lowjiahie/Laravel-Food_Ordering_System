<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Food.xsl
    Created on : March 29, 2022, 3:43 PM
    Author     : Asus
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Handbook</title>
            </head>
            <body style="margin-left:30%">
                <h3 style="text-decoration: underline;">Handbook for Creating and Updating Dishes and Bevergaes</h3>
                <h3 style="text-decoration: underline;">Dishes</h3>
                <h4>Good and Encouraged Example</h4>
                <table style="border-style: groove;">
                    <tr bgcolor="#FF7F50">
                        <th> Food Name </th>
                        <th> Food Description </th>
                        <th> Food Price </th>
                        <th> Food Quantity </th>
                    </tr>
                    <xsl:for-each select="foodList/dishes/dish">
                        <xsl:if test="@type='True'">
                            <tr style="border-style: groove;">
                                <td>
                                    <xsl:value-of select="foodName"/>
                                </td>
                                <td>
                                    <xsl:value-of select="foodDescription"/>
                                </td>
                                <td>
                                    <xsl:value-of select="price"/>
                                </td>
                                <td>
                                    <xsl:value-of select="quantity"/>
                                </td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
                </table>
                <h4>Bad and Not Encouraged Example</h4>
                <table style="border-style: groove;">
                    <tr bgcolor="#FF7F50">
                        <th> Food Name </th>
                        <th> Food Description </th>
                        <th> Food Price </th>
                        <th> Food Quantity </th>
                    </tr>
                    <xsl:for-each select="//dish">
                        <xsl:if test="@type='False'">
                            <tr>
                                <td>
                                    <xsl:value-of select="foodName"/>
                                </td>
                                <td>
                                    <xsl:value-of select="foodDescription"/>
                                </td>
                                <td>
                                    <xsl:value-of select="price"/>
                                </td>
                                <td>
                                    <xsl:value-of select="quantity"/>
                                </td>
                            </tr>
                            <div style="color:red"><xsl:value-of select="comment"/></div>
                        </xsl:if>
                    </xsl:for-each>
                </table>
                <h3 style="text-decoration: underline;">Beverages</h3>
                <h4>Good and Encouraged Example</h4>
                <table style="margin-top: 20px; border-style: groove;">
                    <tr bgcolor="#FF7F50">
                        <th> Food Name </th>
                        <th> Food Description </th>
                        <th> Food Price </th>
                        <th> Food Quantity </th>
                    </tr>
                    <xsl:for-each select="//beverage">
                        <xsl:if test="@type='True'">
                            <tr>
                                <td>
                                    <xsl:value-of select="foodName"/>
                                </td>
                                <td>
                                    <xsl:value-of select="foodDescription"/>
                                </td>
                                <td>
                                    <xsl:value-of select="price"/>
                                </td>
                                <td>
                                    <xsl:value-of select="quantity"/>
                                </td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
                </table>
                <h4>Bad and Not Encouraged Example</h4>
                <table style="border-style: groove;">
                    <tr bgcolor="#FF7F50">
                        <th> Food Name </th>
                        <th> Food Description </th>
                        <th> Food Price </th>
                        <th> Food Quantity </th>
                    </tr>
                    <xsl:for-each select="//beverage">
                        <xsl:if test="@type='False'">
                            <tr>
                                <td>
                                    <xsl:value-of select="foodName"/>
                                </td>
                                <td>
                                    <xsl:value-of select="foodDescription"/>
                                </td>
                                <td>
                                    <xsl:value-of select="price"/>
                                </td>
                                <td>
                                    <xsl:value-of select="quantity"/>
                                </td>
                            </tr>
                            <div style="color:red"><xsl:value-of select="comment"/></div>
                        </xsl:if>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
