<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <h2>Today Bookings</h2>
        <table border="1">
            <tr bgcolor="#00FF7F">
                <th>id</th>
                <th>nickname</th>
                <th>bookingDatetime</th>
                <th>partSize</th>
            </tr>
            <xsl:for-each select="//booking">
                <tr>
                    <td>
                        <xsl:value-of select="@id" />
                    </td>
                    <td>
                        <xsl:value-of select="nickname" />
                    </td>
                    <td>
                        <xsl:value-of select="bookingDatetime" />
                    </td>
                    <td>
                        <xsl:value-of select="partSize" />
                    </td>
                </tr>
            </xsl:for-each>
        </table>
    </xsl:template>

</xsl:stylesheet>