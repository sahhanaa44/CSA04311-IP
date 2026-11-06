import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class ClientServer extends HttpServlet {
    public void doGet(HttpServletRequest req, HttpServletResponse res)
    throws IOException, ServletException {

        res.setContentType("text/html");
        PrintWriter out = res.getWriter();

        String name = req.getParameter("name");

        out.println("<h2>Client Connected Successfully!</h2>");
        out.println("Hello " + name);
    }
}