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

/* project/searchBar.html.twig */
class __TwigTemplate_be5f9819c7b36e8c8a1b42763f490165c0e70203cb2f24821c4907e90f587f6f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "project/searchBar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "project/searchBar.html.twig"));

        // line 1
        echo         // line 2
        $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["attr" => ["class" => "form-inline my-2 my-lg-0", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("handleSearch")]]);
        // line 8
        echo "
";
        // line 9
        echo         // line 10
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "query", [], "any", false, false, false, 10), 'widget', ["attr" => ["class" => "form-control mr-sm-2", "type" => "number"]]);
        // line 16
        echo "
";
        // line 17
        echo         // line 18
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "search", [], "any", false, false, false, 18), 'widget', ["attr" => ["class" => "btn btn-secondary my-2 my-sm-0"]]);
        // line 23
        echo "
";
        // line 24
        echo         // line 25
        $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), 'form_end');
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "project/searchBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 25,  61 => 24,  58 => 23,  56 => 18,  55 => 17,  52 => 16,  50 => 10,  49 => 9,  46 => 8,  44 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{
    form_start(form, {
        'attr': {
            'class': 'form-inline my-2 my-lg-0',
            'action': path('handleSearch')
        }
    })
}}
{{
    form_widget(form.query, {
        'attr': {
            'class' : \"form-control mr-sm-2\",
            'type' : 'number',
        }
    })
}}
{{
    form_widget(form.search, {
        'attr': {
            'class' : \"btn btn-secondary my-2 my-sm-0\"
        }
    })
}}
{{
    form_end(form)
}}", "project/searchBar.html.twig", "C:\\Users\\Thiba\\OneDrive\\Documents\\Ecam\\Programmation\\Architecture_Web\\demo\\templates\\project\\searchBar.html.twig");
    }
}
