<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\MenusRepository;
use Gate;
use Menu;
use Corp\Category;

class MenusController extends AdminController
{
    protected $m_rep;

    public function __construct(MenusRepository $m_rep,
                                ArticlesRepository $a_rep,
                                PortfoliosRepository $p_rep){
        parent::__construct();



        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;

        $this->template = env('THEME').'.admin.menus';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //VIEW_ADMIN_MENU
        if(Gate::denies('VIEW_ADMIN_MENU')){
            abort(403);
        }

        $menus = $this->getMenus();

        $this->content = view(env('THEME').'.admin.menus_content')
        ->with('menus',$menus)
        ->render();

        return $this->renderOutput();
    }

    public function getMenus(){
        $menu = $this->m_rep->get();

        if($menu->isEmpty()){
            return false;
        }

        return Menu::make('forMenuPart', function($m) use($menu){
            foreach($menu as $item){
                if($item->parent == 0){
                    $m->add($item->title, $item->path)->id($item->id);
                } else {
                    if($m->find($item->parent)){
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $this->title = 'Новый пункт меню';

        $tmp = $this->getMenu()->roots();
        //dd($tmp);
        $menus = $tmp->reduce(function($returnMenus, $menu){
            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;
        },['0' => 'Родительский пункт меню']);

        $categories = Category::select(['title', 'alias', 'parent_id', 'id'])->get();

        $list = [];
        $list = array_add($list, '0', 'Не используется');
        $list = array_add($list, 'parent', 'Раздел блог');

        foreach($categories as $category){
            if($category->parent_id == 0){
                $list[$category->title] = [];
            } else {
                $list[$categories->where('id', $category->parent_id)
                ->first()->title][$category->alias] = $category->title;
            }
        }

        $articles = $this->a_rep->get(['id', 'title', 'alias']);

        $articles = $articles->reduce(function ($returnArticles, $article){
            $returnArticles[$article->alias] = $article->title;
            return $returnArticles;
        },[]);

        $filters = \Corp\Filter::select(['id','title','alias'])->get()->reduce(function($returnFilters, $filter){
            $returnFilters[$filter->alias] = $filter->title;
            return $returnFilters;
        }, ['parent'=>'Раздел портфолио']);

        $portfolios = $this->p_rep->get(['id', 'alias', 'title'])
        ->reduce(function($returnPortfolios, $portfolio){
            $returnPortfolios[$portfolio->alias] = $portfolio->title;
            return $returnPortfolios;
        });

//==========================================================================
$this->content = view(env('THEME').'.admin.menus_create_content')->with(['menus'=>$menus,'categories'=>$list,'articles'=>$articles,'filters' => $filters,'portfolios' => $portfolios])->render();
//=========================================================================
return $this->renderOutput();
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \Corp\Menu $menu
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param \Corp\Menu $menu
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
