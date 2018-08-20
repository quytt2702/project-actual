<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Url;
use App\Validators\UrlValidator;
use App\Repositories\Contracts\UrlRepository;

class UrlRepositoryEloquent extends BaseRepository implements UrlRepository
{
    public function model()
    {
        return Url::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByUrl($url)
    {
        return $this->model
            ->where('url_url', $url)
            ->first();
    }

    public function deleteByUrl($url)
    {
        return $this->model
            ->where('url.url_url', $url)
            ->delete();
    }

    public function findByUrlLandingPage()
    {
        return $this->model
            ->where('url_ten_loai', Url::TEN_LOAI['LANDING_PAGE'])
            ->get();
    }

    public function showUrlCongTacVien($paginate = null)
    {
        $model = $this->model
            ->whereIn('url_ten_loai', [
                Url::TEN_LOAI['LANDING_PAGE'],
                Url::TEN_LOAI['SAN_PHAM'],
                Url::TEN_LOAI['TMDT'],
                Url::TEN_LOAI['CM_SAN_PHAM'],
            ])
            ->orderBy('url_ten_loai');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function showNewUrlCongTacVien($paginate = null)
    {
        $model = $this->model
            ->where('is_view_cong_tac_vien', Url::IS_VIEW_CONG_TAC_VIEN['YES'])
            ->orderBy('url_ten_loai');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function deleteIfExist($url)
    {
        $url = $this->findByUrl($url);

        if (!empty($url)) {
            return $url->delete();
        }

        return 0;
    }

    public function searchUrl($key)
    {
        return $this->model
            ->where('url_url', 'like', '%' . $key . '%')
            ->pluck('url_url');
    }

    public function getAll($paginate = null)
    {
        $model = $this->model;
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getAllWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('url.url_url', 'LIKE', '%'.$search.'%')
                    ->orWhere('url.url_ten_loai', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }


    public function searchUrlWithIdNgonNgu($key, $idNgonNgu)
    {
        return $this->model
            ->where('url_url', 'like', '%' . $key . '%')
            ->where('id_ngon_ngu', $idNgonNgu)
            ->pluck('url_url');
    }

    public function showUrlCongTacVienWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->whereIn('url_ten_loai', [
                Url::TEN_LOAI['LANDING_PAGE'],
                Url::TEN_LOAI['SAN_PHAM'],
                Url::TEN_LOAI['TMDT'],
                Url::TEN_LOAI['CM_SAN_PHAM'],
            ])
            ->orderBy('url_ten_loai')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('url.url_url', 'LIKE', '%'.$search.'%')
                    ->orWhere('url.url_ten_loai', 'LIKE', '%'.$search.'%');
            });

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
