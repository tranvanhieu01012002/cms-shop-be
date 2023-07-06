<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Constants\Pagination;

class PaginateResourceCollection extends ResourceCollection
{
    public function generateLinks()
    {
        $links = round($this->collection['masterData']['count'] / Pagination::LIMIT);
        $response = array();
        $currentPage = request()->query("page") ?? Pagination::FIRST_PAGE;
        $response[0] = [
            'url' => (int)$currentPage === Pagination::FIRST_PAGE ? null : url()->current() . '?page=' . $currentPage - 1,
            'label' => (int)$currentPage === Pagination::FIRST_PAGE ? '' : Pagination::PRE_LABEL,
            'active' => Pagination::INACTIVE
        ];
        if ($links < Pagination::NUM_OF_LINKS) {
            for ($i = 1; $i < $links + 1; $i++) {
                $response[$i] = [
                    'url' => url()->current() . '?page=' . $i,
                    'label' => $i,
                    'active' => (int)$currentPage === $i
                ];
            }
        } else {
            for ($i = 1; $i < $links + 1; $i++) {
                if (
                    $i <= 2
                    || $i >= $links - 1
                    || ($i + Pagination::NUM_OF_AROUND_CURRENT_PAGE >= $currentPage
                        &&
                        $i - 2  <= Pagination::NUM_OF_AROUND_CURRENT_PAGE
                    )
                ) {
                    $response[$i] = [
                        'url' => url()->current() . '?page=' . $i,
                        'label' => $i,
                        'active' => (int)$currentPage === $i
                    ];
                } else if ($i === 3 || $i === (int)$links - 2) {
                    $response[$i] = [
                        'url' => null,
                        'label' => '...',
                        'active' => (int)$currentPage === $i
                    ];
                }
            }
        }
        $response[$links + 2] = [
            'url' => url()->current() . '?page=' . $currentPage + 1,
            'label' => (int)$currentPage === (int)$links  ? '' : Pagination::NEXT_LABEL,
            'active' => Pagination::INACTIVE
        ];
        return $response;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
