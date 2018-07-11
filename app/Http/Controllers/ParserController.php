<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpQuery;
use App\Parser;
use App\User;

class ParserController extends Controller
{
    protected $youtube = 'www.youtube.com';
    protected $rutube = 'rutube.ru';
    protected $vimeo = 'vimeo.com';


    public function index()
    {
        return view('parser');
    }

    public function store(Request $request)
    {
        $url = $request->url;
        $host = parse_url($url, PHP_URL_HOST);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $response = $response->getBody();

        $str1 = 'meta';
        $str2 = 'twitter:app';

        $pos = strpos($response, $str1);
        $content = substr($response, $pos);

        $pos = strpos($content, $str2);
        $content = substr($content, 0, $pos);

        $pq = phpQuery::newDocument($content);

        if($host == $this->youtube) {
            $title = $pq->find('meta[property="og:title"]')->attr('content');
            $desc = $pq->find('meta[property="og:description"]')->attr('content');
            $videoUrl = $pq->find('meta[property="og:video:url"]')->attr('content');
            $imgUrl = $pq->find('meta[property="og:image"]')->attr('content');
        } elseif ($host == $this->rutube){
            $title = $pq->find('meta[property="og:title"]')->attr('content');
            $desc = $pq->find('meta[property="og:description"]')->attr('content');
            $videoUrl = $pq->find('meta[property="og:video"]')->attr('content');
            $imgUrl = $pq->find('meta[property="og:image"]')->attr('content');
        } elseif (($host == $this->vimeo)) {
            $lastElem = basename(parse_url($url, PHP_URL_PATH));
            $title = $pq->find('meta[property="og:title"]')->attr('content');
            $desc = $pq->find('meta[property="og:description"]')->attr('content');
            //$videoUrl = $pq->find('meta[property="twitter:player"]')->attr('content');
            //https://player.vimeo.com/video/277358128;
            $videoUrl = "https://player.vimeo.com/video/$lastElem";
            $imgUrl = $pq->find('meta[property="og:image"]')->attr('content');
        } else {
            echo "Error HOST";
        }
        //save data in db
        $parser = new Parser;
        $parser->title = $title;
        $parser->description = $desc;
        $parser->video_url = $videoUrl;
        $parser->image_url = $imgUrl;
        $parser->save();

        return redirect()->route('show');
    }

    public function show()
    {
        $parsers = Parser::with('user')->orderBy('created_at')->get();

        return view('content',
            [
                'parsers'=>$parsers
            ]);
    }

    public function getVideo($id)
    {
        $parser = Parser::find($id);

        return view('video', compact('parser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $parser = Parser::find($id);
        $parser->delete();

        return redirect()->route('view');
    }

}


