<%@ page import="java.sql.*" %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Property Listings</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Property Listings</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Bedrooms</th>
    <th>Location</th>
    <th>Price</th>
    <th>Availability</th>
    <th>Description</th>
  </tr>

<%
// Database connection parameters

String url = "jdbc:mysql://localhost:3306/propertyinfo";
String username = "admin";
String password = "";

// Initialize variables for database connection and query execution
Connection conn = null;
Statement stmt = null;
ResultSet rs = null;

try {
    // Load the MySQL JDBC driver
    Class.forName("com.mysql.cj.jdbc.Driver");

    // Establish the database connection
    conn = DriverManager.getConnection(url, username, password);

    // Execute the SQL query to fetch data
    stmt = conn.createStatement();
    rs = stmt.executeQuery("SELECT * FROM your_table_name");

    // Iterate over the result set and display the data in HTML table rows
    while (rs.next()) {
%>
  <tr>
    <td><%= rs.getInt("id") %></td>
    <td><%= rs.getInt("bedrooms") %></td>
    <td><%= rs.getString("location") %></td>
    <td><%= rs.getDouble("price") %></td>
    <td><%= rs.getString("availability") %></td>
    <td><%= rs.getString("description") %></td>
  </tr>
<%
    }
} catch (Exception e) {
    e.printStackTrace();
} finally {
    // Close the database resources
    if (rs != null) try { rs.close(); } catch (SQLException e) {}
    if (stmt != null) try { stmt.close(); } catch (SQLException e) {}
    if (conn != null) try { conn.close(); } catch (SQLException e) {}
}
%>

</table>

</body>
</html>
