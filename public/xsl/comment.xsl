<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>comment.xsl</title>
            </head>
            <body>
            
                <table align='center' width='80%' border='1'>
                    <tr>
                        <th>Replies Id</th>
                        <th>Replies Description</th>
                        <th>Post Id</th>
                        <th>Account Id</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    <xsl:for-each select="comments/replies">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="description"/></td>
                            <td><xsl:value-of select="postId"/></td>
                            <td><xsl:value-of select="account_id"/></td>
                            <td><xsl:value-of select="@createdDate"/></td>
                            <td><xsl:value-of select="@updatedDate"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
