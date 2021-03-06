<?php

namespace App\StorefrontModule\Presenters;

use App\Model\Facades\CmsPageFacade;

class HomepagePresenter extends BasePresenter
{
    private CmsPageFacade $cmsPageFacade;

    public function renderDefault()
    {
        $cmsPage = $this->cmsPageFacade->getCmsPageBySlug('home');

        $this->template->cmsPage = $cmsPage;
    }

    public function injectCmsPageFacade(CmsPageFacade $cmsPageFacade)
    {
        $this->cmsPageFacade = $cmsPageFacade;
    }
}
