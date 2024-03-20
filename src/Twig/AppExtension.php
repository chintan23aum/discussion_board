<?php
namespace App\Twig;

use App\Service\CategoryService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $categoryservice;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryservice = $categoryService;
    }
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getCategory', [$this, 'getCategory']),
        ];
    }

    public function getCategory(): array
    {
        return $this->categoryservice->getAllCategory();
    }
}