<?php
    class Controller {
        function render(
            String $pageTitle = '',
            String $mainContent = '',
        ) {
            require_once(DOCUMENT_ROOT.'/views/template.php');
        }

        function err404() {
            ob_start();
            require_once(DOCUMENT_ROOT.'/views/404.php');
            $content = ob_get_clean();
            $this->render(
                pageTitle: '404',
                mainContent: $content
            );
        }

        function generateCards($movies) {
            $html = '';
            foreach ($movies as $movie) {
                ob_start();
                require(DOCUMENT_ROOT.'/views/card.php');
                $html .= ob_get_clean();
            }
            return $html;
        }

        function getPage() {
            if (isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) {$page = intval($_GET['page']);}
            else {$page = 1;}
            if ($page < 1) {$page = 1;}
            else if ($page > 500) {$page = 500;}
            return $page;
        }

        function generatePagination($page, $maxPage, $url) {
            $start = $page-2;
            if ($start < 1) {$start = 1;}
            else if ($start > $maxPage-4) {
                $start = $maxPage-4;
                if ($start < 1) {$start = 1;}
            }
            $end = $start+4;
            if ($end > $maxPage) {$end = $maxPage;}
            $active = $page == 1 ? 'dark"' : 'primary" href="'.ROOT_PATH.'/'.$url.'page='.($page-1).'"';
            $html = <<<END
                <div class="d-flex justify-content-center gap-3">
                    <a class="fs-5 text-decoration-none text-$active>&lt;&lt;</a>
            END;
            if ($start > 1) {$html .= '<span>...</span>';}
            for ($i = $start; $i <= $end; $i++) {
                if ($i == $page) {$html .= '<span class="fs-5">'.$i.'</span>';}
                else {$html .= '<a class="fs-5 text-decoration-none text-primary" href="'.ROOT_PATH.'/'.$url.'page='.$i.'">'.$i.'</a>';}
            }
            if ($end < $maxPage) {$html .= '<span>...</span>';}
            $active = $page == $maxPage ? 'dark"' : 'primary" href="'.ROOT_PATH.'/'.$url.'page='.($page+1).'"';
            $html .= <<<END
                    <a class="fs-5 text-decoration-none text-$active>&gt;&gt;</a>
                </div>
            END;
            return $html;
        }

        function home() {
            $page = $this->getPage();
            $response = $GLOBALS['CLIENT']->get(
                'movie/popular',
                [
                    'query' => [
                        'api_key'  => API_KEY,
                        'language' => API_LANGUAGE,
                        'page'     => $page,
                    ],
                ],
            );
            $response = json_decode($response->getBody()->getContents(), true);
            $movies = $this->generateCards($response['results']);
            $pagination = $this->generatePagination($page, ($response['total_pages'] <= 500 ? $response['total_pages'] : 500), 'home?');
            ob_start();
            require_once(DOCUMENT_ROOT.'/views/home.php');
            $this->render(
                pageTitle: 'Accueil',
                mainContent: ob_get_clean(),
            );
        }

        function research() {
            if (isset($_GET['research']) && !empty($_GET['research']) && strlen($_GET['research']) <= MAX_RESEARCH_LENGTH) {
                $page = $this->getPage();
                $response = $GLOBALS['CLIENT']->get(
                    'search/movie',
                    [
                        'query' => [
                            'api_key'  => API_KEY,
                            'language' => API_LANGUAGE,
                            'page'     => $page,
                            'query'    => $_GET['research'],
                        ],
                    ],
                );
                $response = json_decode($response->getBody()->getContents(), true);
                $movies = $this->generateCards($response['results']);
                $pagination = $this->generatePagination($page, ($response['total_pages'] <= 500 ? $response['total_pages'] : 500), 'research?research='.$_GET['research'].'&');
                ob_start();
                require_once(DOCUMENT_ROOT.'/views/research.php');
                $this->render(
                    pageTitle: 'Recherche',
                    mainContent: ob_get_clean(),
                );
            }
            else {header('Location: '.ROOT_PATH.'/home');}
        }

        function movie() {
            if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
                $response = $GLOBALS['CLIENT']->get(
                    'movie/'.$_GET['id'],
                    [
                        'query' => [
                            'api_key'  => API_KEY,
                            'language' => API_LANGUAGE,
                        ],
                    ],
                );
                $movie = json_decode($response->getBody()->getContents(), true);
                ob_start();
                require_once(DOCUMENT_ROOT.'/views/movie.php');
                $this->render(
                    pageTitle: $movie['title'],
                    mainContent: ob_get_clean(),
                );
            }
            else {header('Location: '.ROOT_PATH.'/home');}
        }
    }
?>