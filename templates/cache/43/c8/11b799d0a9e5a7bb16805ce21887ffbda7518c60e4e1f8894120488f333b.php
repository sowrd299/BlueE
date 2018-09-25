<?php

/* installer/config.html */
class __TwigTemplate_43c811b799d0a9e5a7bb16805ce21887ffbda7518c60e4e1f8894120488f333b extends Twig_Template
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
        echo "<form action=\"?step=3\" method=\"post\" autocomplete=\"off\">
\t<fieldset>
\t<legend>Database (MySQL)</legend>
\t\t<label for=\"db_server\">Server:</label> 
\t\t<input type=\"text\" id=\"db_server\" name=\"db[server]\" value=\"";
        // line 5
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "db"), "server");
        echo "\">

\t\t<label for=\"db_db\">Database:</label> 
\t\t<input type=\"text\" id=\"db_db\" name=\"db[database]\" value=\"";
        // line 8
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "db"), "database");
        echo "\">

\t\t<label for=\"db_prefix\">Table prefix (optional):</label> 
\t\t<input type=\"text\" id=\"db_prefix\" name=\"db[prefix]\" value=\"";
        // line 11
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "db"), "prefix");
        echo "\">

\t\t<label for=\"db_user\">Username:</label> 
\t\t<input type=\"text\" id=\"db_user\" name=\"db[user]\" value=\"";
        // line 14
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "db"), "user");
        echo "\">

\t\t<label for=\"db_pass\">Password:</label> 
\t\t<input type=\"password\" id=\"db_pass\" name=\"db[password]\" value=\"\">
\t</fieldset>
\t<p style=\"text-align:center\" class=\"unimportant\">The following is all later configurable. For more options, <a href=\"http://tinyboard.org/docs/?p=Config\">edit your configuration files</a> after installing.</p>
\t<fieldset>
\t<legend>Cookies</legend>
\t\t<label for=\"cookies_mod\">Moderator cookie:</label> 
\t\t<input type=\"text\" id=\"cookies_mod\" name=\"cookies[mod]\" value=\"";
        // line 23
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "cookies"), "mod");
        echo "\">

\t\t<label for=\"cookies_salt\">Secure salt:</label> 
\t\t<input type=\"text\" id=\"cookies_salt\" name=\"cookies[salt]\" value=\"";
        // line 26
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "cookies"), "salt");
        echo "\" size=\"40\">
\t</fieldset>

\t<fieldset>
\t<legend>Flood control</legend>
\t\t<label for=\"flood_time\">Seconds before each post:</label> 
\t\t<input type=\"text\" id=\"flood_time\" name=\"flood_time\" value=\"";
        // line 32
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "flood_time");
        echo "\">

\t\t<label for=\"flood_time_ip\">Seconds before you can repost something (post the exact same text):</label> 
\t\t<input type=\"text\" id=\"flood_time_ip\" name=\"flood_time_ip\" value=\"";
        // line 35
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "flood_time_ip");
        echo "\">

\t\t<label for=\"flood_time_same\">Same as above, but with a different IP address:</label> 
\t\t<input type=\"text\" id=\"flood_time_same\" name=\"flood_time_same\" value=\"";
        // line 38
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "flood_time_same");
        echo "\">

\t\t<label for=\"max_body\">Maximum post body length:</label> 
\t\t<input type=\"text\" id=\"max_body\" name=\"max_body\" value=\"";
        // line 41
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_body");
        echo "\">

\t\t<label for=\"reply_limit\">Replies in a thread before it can no longer be bumped:</label> 
\t\t<input type=\"text\" id=\"reply_limit\" name=\"reply_limit\" value=\"";
        // line 44
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "reply_limit");
        echo "\">

\t\t<label for=\"max_links\">Maximum number of links in a single post:</label> 
\t\t<input type=\"text\" id=\"max_links\" name=\"max_links\" value=\"";
        // line 47
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_links");
        echo "\">\t\t\t
\t</fieldset>

\t<fieldset>
\t<legend>Images</legend>
\t\t<label for=\"max_filesize\">Maximum image filesize (bytes):</label> 
\t\t<input type=\"text\" id=\"max_filesize\" name=\"max_filesize\" value=\"";
        // line 53
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_filesize");
        echo "\">

\t\t<label for=\"thumb_width\">Thumbnail width:</label> 
\t\t<input type=\"text\" id=\"thumb_width\" name=\"thumb_width\" value=\"";
        // line 56
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "thumb_width");
        echo "\">

\t\t<label for=\"thumb_height\">Thumbnail height:</label> 
\t\t<input type=\"text\" id=\"thumb_height\" name=\"thumb_height\" value=\"";
        // line 59
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "thumb_height");
        echo "\">

\t\t<label for=\"max_width\">Maximum image width:</label> 
\t\t<input type=\"text\" id=\"max_width\" name=\"max_width\" value=\"";
        // line 62
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_width");
        echo "\">

\t\t<label for=\"max_height\">Maximum image height:</label> 
\t\t<input type=\"text\" id=\"max_height\" name=\"max_height\" value=\"";
        // line 65
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_height");
        echo "\">
\t</fieldset>

\t<fieldset>
\t<legend>Display</legend>
\t\t<label for=\"threads_per_page\">Threads per page:</label> 
\t\t<input type=\"text\" id=\"threads_per_page\" name=\"threads_per_page\" value=\"";
        // line 71
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "threads_per_page");
        echo "\">

\t\t<label for=\"max_pages\">Page limit:</label> 
\t\t<input type=\"text\" id=\"max_pages\" name=\"max_pages\" value=\"";
        // line 74
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_pages");
        echo "\">

\t\t<label for=\"threads_preview\">Number of replies to show per thread on the index page:</label> 
\t\t<input type=\"text\" id=\"threads_preview\" name=\"threads_preview\" value=\"";
        // line 77
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "threads_preview");
        echo "\">
\t</fieldset>

\t<fieldset>
\t<legend>Directories</legend>
\t\t<label for=\"root\">Root URI (include trailing slash):</label> 
\t\t<input type=\"text\" id=\"root\" name=\"root\" value=\"";
        // line 83
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
        echo "\" size=\"40\">
\t</fieldset>

\t<fieldset>
\t<legend>Miscellaneous</legend>
\t\t<label for=\"secure_trip_salt\">Secure trip (##) salt:</label> 
\t\t<input type=\"text\" id=\"secure_trip_salt\" name=\"secure_trip_salt\" value=\"";
        // line 89
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "secure_trip_salt");
        echo "\" size=\"40\">
\t</fieldset>

\t<p style=\"text-align:center\">
\t\t<input type=\"submit\" value=\"Complete installation\">
\t</p>
</form>
";
    }

    public function getTemplateName()
    {
        return "installer/config.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 89,  166 => 83,  157 => 77,  151 => 74,  145 => 71,  136 => 65,  130 => 62,  124 => 59,  118 => 56,  112 => 53,  103 => 47,  97 => 44,  91 => 41,  85 => 38,  79 => 35,  73 => 32,  64 => 26,  58 => 23,  46 => 14,  40 => 11,  34 => 8,  28 => 5,  22 => 1,);
    }
}
