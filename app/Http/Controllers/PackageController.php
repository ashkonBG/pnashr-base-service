<?php

namespace App\Http\Controllers;

use App\Repositories\Package\PackageRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * @var PackageRepositoryInterface
     */
    private $packageRepository;

    /**
     * PackageController constructor.
     *
     * @param PackageRepositoryInterface $packageRepository
     */
    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json($this->packageRepository->getAll($request));
    }

    /**
     * @param int $packageId
     *
     * @return JsonResponse
     */
    public function show(int $packageId)
    {
        return response()->json($this->packageRepository->findAndUpdateViewCount($packageId));
    }
}
