package lerserial;

import java.sql.*;

public class AcessoBD {
   
private String pedidoSQL;
private String dado;
private String horario;

private Connection con = null;
private Statement stmt = null;

public AcessoBD() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("AcessoBD> Estabelecendo a conexão com o BD...");
            con = DriverManager.getConnection("jdbc:mysql://localhost/controle?user=root&password=");
            System.out.println("AcessoBD> Conexao bem sucedida.");
            stmt = con.createStatement();
        } catch (ClassNotFoundException cnfe) {
            System.out.println("Excessao de classe nao encontrada.");
        } catch (SQLException sqle) {
            sqle.printStackTrace();
            System.out.println("Excessao de conexao ao banco.");
        }
    }

    public void executaPedido(String pedido) {
        this.pedidoSQL = pedido;
        try {
            int execUpdate = stmt.executeUpdate(pedidoSQL);
        } catch (SQLException sqle) {
            System.out.println("Excessao: " + sqle.toString());
        }
    }

}
