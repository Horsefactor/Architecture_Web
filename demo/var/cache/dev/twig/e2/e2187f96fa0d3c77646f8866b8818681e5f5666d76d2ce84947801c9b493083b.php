<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* project/Annonce.html.twig */
class __TwigTemplate_7f2374c727257f653419ba4d11e5ae816fbb2e4dbb17bc11fb7bc271b13309de extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "project/Annonce.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "project/Annonce.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "project/Annonce.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <hr>
    <div align=\"center\">
    
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["annonces"]) || array_key_exists("annonces", $context) ? $context["annonces"] : (function () { throw new RuntimeError('Variable "annonces" does not exist.', 6, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["annonce"]) {
            // line 7
            echo "    <div class=\"card border-info mb-3\" style=\"max-width: 20rem;\">
        <div class=\"card-header\"> post n°";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["annonce"], "id", [], "any", false, false, false, 8), "html", null, true);
            echo " &nbsp;:&nbsp; ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["annonce"], "user", [], "any", false, false, false, 8), "type", [], "any", false, false, false, 8), "html", null, true);
            echo "</div>
        <div class=\"card-body\">
            <h4 class=\"card-title\">
                ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["annonce"], "user", [], "any", false, false, false, 11), "name", [], "any", false, false, false, 11), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["annonce"], "user", [], "any", false, false, false, 11), "age", [], "any", false, false, false, 11), "html", null, true);
            echo " ans
            </h4>
            <h5 class=\"card-title\">
                Categories:
                ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["annonce"], "categories", [], "any", false, false, false, 15));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                echo " 
                    ";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "title", [], "any", false, false, false, 16), "html", null, true);
                echo ",&nbsp;
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "            </h5>
            <hr class=\"my-4\">
            <p class= \"card-text\">
                ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["annonce"], "content", [], "any", false, false, false, 21), "html", null, true);
            echo "
            </p>
            <hr>
            <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("showAnnonce", ["id" => twig_get_attribute($this->env, $this->source, $context["annonce"], "id", [], "any", false, false, false, 24)]), "html", null, true);
            echo "\" class=\"btn btn-outline-success\">Read</a>
            ";
            // line 25
            if ((twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "user", [], "any", false, false, false, 25) == twig_get_attribute($this->env, $this->source, $context["annonce"], "user", [], "any", false, false, false, 25))) {
                // line 26
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("post_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["annonce"], "id", [], "any", false, false, false, 26)]), "html", null, true);
                echo "\" class=\"btn btn-outline-warning\">Edit</a>
                <a href='";
                // line 27
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_post", ["id" => twig_get_attribute($this->env, $this->source, $context["annonce"], "id", [], "any", false, false, false, 27)]), "html", null, true);
                echo "' class=\"btn btn-outline-danger\">Delete my post</a>
            ";
            }
            // line 29
            echo "        </div>
        <div class=\"card-footer text-muted\">
            Writed down on the ";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["annonce"], "createdAt", [], "any", false, false, false, 31), "d/m/Y"), "html", null, true);
            echo "
            at ";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["annonce"], "createdAt", [], "any", false, false, false, 32), "H:i"), "html", null, true);
            echo "
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['annonce'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "project/Annonce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 36,  146 => 32,  142 => 31,  138 => 29,  133 => 27,  128 => 26,  126 => 25,  122 => 24,  116 => 21,  111 => 18,  103 => 16,  97 => 15,  88 => 11,  80 => 8,  77 => 7,  73 => 6,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <hr>
    <div align=\"center\">
    
    {% for annonce in annonces %}
    <div class=\"card border-info mb-3\" style=\"max-width: 20rem;\">
        <div class=\"card-header\"> post n°{{annonce.id}} &nbsp;:&nbsp; {{annonce.user.type}}</div>
        <div class=\"card-body\">
            <h4 class=\"card-title\">
                {{annonce.user.name}}, {{annonce.user.age}} ans
            </h4>
            <h5 class=\"card-title\">
                Categories:
                {% for category in annonce.categories %} 
                    {{category.title}},&nbsp;
                {% endfor %}
            </h5>
            <hr class=\"my-4\">
            <p class= \"card-text\">
                {{annonce.content}}
            </p>
            <hr>
            <a href=\"{{ path('showAnnonce', {'id': annonce.id})}}\" class=\"btn btn-outline-success\">Read</a>
            {% if app.user == annonce.user %}
                <a href=\"{{path('post_edit', {'id': annonce.id})}}\" class=\"btn btn-outline-warning\">Edit</a>
                <a href='{{path('delete_post',{'id': annonce.id}) }}' class=\"btn btn-outline-danger\">Delete my post</a>
            {% endif %}
        </div>
        <div class=\"card-footer text-muted\">
            Writed down on the {{annonce.createdAt | date('d/m/Y')}}
            at {{annonce.createdAt | date('H:i')}}
        </div>
    </div>
    {% endfor %}
    </div>
{% endblock %}", "project/Annonce.html.twig", "C:\\Users\\Thiba\\OneDrive\\Documents\\Ecam\\Programmation\\Architecture_Web\\demo\\templates\\project\\Annonce.html.twig");
    }
}
