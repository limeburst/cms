<?php
use Ridibooks\Platform\Cms\Auth\AdminUserService;
use Ridibooks\Platform\Common\PagingUtil;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$adminUserService = new AdminUserService();

$page = $request->get('page');
$search_text = $request->get("search_text");

$pagingDto = new PagingUtil($adminUserService->getAdminUserCount($search_text), $page, null, 20);

$admin_user_list = $adminUserService->getAdminUserList($search_text, $pagingDto);
$paging = AdminUserService::getPagingTagByPagingDtoNew($pagingDto);

return compact(
	'admin_user_list',
	'paging',
	'page',
	'search_text'
);