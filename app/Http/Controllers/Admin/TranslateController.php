<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TranslateController extends Controller
{
    public function translate(Request $request)
    {
        $request->validate([
            'html' => ['required', 'string', 'max:10000'],
            'from' => ['required', 'in:en,km'],
            'to'   => ['required', 'in:en,km'],
        ]);

        $langMap = ['en' => 'en', 'km' => 'km'];

        try {
            $response = Http::timeout(15)
                ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                ->get('https://translate.googleapis.com/translate_a/single', [
                    'client' => 'gtx',
                    'sl'     => $langMap[$request->from],
                    'tl'     => $langMap[$request->to],
                    'dt'     => 't',
                    'q'      => $request->html,
                ]);

            if (!$response->ok()) {
                return response()->json(['error' => 'Translation service unavailable.'], 502);
            }

            $data = $response->json();

            // Response is [[["translated","original",...], ...], ...]
            $translation = '';
            if (isset($data[0]) && is_array($data[0])) {
                foreach ($data[0] as $segment) {
                    if (isset($segment[0])) {
                        $translation .= $segment[0];
                    }
                }
            }

            return response()->json(['translation' => trim($translation)]);

        } catch (\Throwable $e) {
            return response()->json(['error' => 'Translation failed: ' . $e->getMessage()], 500);
        }
    }
}
