import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class DisplayMessage extends HttpServlet {
    public void doGet(HttpServletRequest req, HttpServletResponse res)
    throws IOException, ServletException {

        res.setContentType("text/html");
        PrintWriter out = res.getWriter();

        out.println("<h2>Welcome to Internet Programming!</h2>");
    }
}