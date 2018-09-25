<?php

/* mod/login.html */
class __TwigTemplate_e62d374ff7c994160c5a6717eb37b00241d58257c131f93f1efa399c3e085784 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((isset($context["error"]) ? $context["error"] : null)) {
            echo "<h2 style=\"text-align:center\">";
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "</h2>";
        }
        // line 2
        echo "<form action=\"\" method=\"post\">
<table style=\"margin-top:25px;\">
\t<tr>
\t\t<th>
\t\t\t";
        // line 6
        echo gettext("Username");
        // line 7
        echo "\t\t</th>
\t\t<td>
\t\t\t<input type=\"text\" name=\"username\" size=\"20\" maxlength=\"30\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null));
        echo "\">
\t\t</td>
\t</tr>
\t<tr>
\t\t<th>
\t\t\t";
        // line 14
        echo gettext("Password");
        // line 15
        echo "\t\t</th>
\t\t<td>
\t\t\t<input type=\"password\" name=\"password\" size=\"20\" maxlength=\"30\" value=\"\">
\t\t</td>
\t</tr>
\t<tr>
\t\t<td></td>
\t\t<td>
\t\t\t<input type=\"submit\" name=\"login\" value=\"";
        // line 23
        echo gettext("Continue");
        echo "\" />
\t\t</td>
</table>
</form>
";
    }

    public function getTemplateName()
    {
        return "mod/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 23,  50 => 15,  48 => 14,  40 => 9,  36 => 7,  34 => 6,  28 => 2,  22 => 1,);
    }
}
