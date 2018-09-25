<?php

/* error.html */
class __TwigTemplate_fea4f3742ea9c6917121774c7911da2d126042803c42d0fba0ff8ae9abca1ac4 extends Twig_Template
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
        echo "<div style=\"text-align:center\">
\t<h2 style=\"margin:20px 0\">";
        // line 2
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "</h2>
\t";
        // line 3
        if ((isset($context["board"]) ? $context["board"] : null)) {
            // line 4
            echo "\t\t<p>
\t\t\t<a href=\"";
            // line 5
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
            if ((isset($context["mod"]) ? $context["mod"] : null)) {
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_mod");
                echo "?/";
            }
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "dir");
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_index");
            echo "\">
\t\t\t\t";
            // line 6
            echo gettext("Go back");
            // line 7
            echo "\t\t\t</a>
\t\t</p>
\t";
        }
        // line 10
        echo "</div>
";
        // line 11
        if (((isset($context["debug"]) ? $context["debug"] : null) && $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "debug"))) {
            // line 12
            echo "\t<hr>
\t<h3>";
            // line 13
            echo gettext("Error information");
            echo "</h3>
\t<pre style=\"white-space:pre-wrap;font-size: 10px;\">
\t\t";
            // line 15
            echo (isset($context["debug"]) ? $context["debug"] : null);
            echo "
\t</pre>
\t<hr>
";
        }
    }

    public function getTemplateName()
    {
        return "error.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 15,  59 => 13,  56 => 12,  54 => 11,  51 => 10,  46 => 7,  44 => 6,  34 => 5,  31 => 4,  29 => 3,  25 => 2,  22 => 1,);
    }
}
