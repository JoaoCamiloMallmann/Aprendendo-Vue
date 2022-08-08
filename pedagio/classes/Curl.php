<?php

namespace Pedagio;

class Curl
{
    private function curl(string $metodo, string $url, array $dados = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        if (!empty($dados)) {
            $dados = json_encode($dados);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        }
        $data = curl_exec($ch);

        $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            $data = 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        $retorno['data'] = $data;
        $retorno['statusCode'] = $info;
        return $retorno;
    }

    public function get(string $url)
    {
        return $this->curl('GET', $url);
    }

    public function post(string $url, array $dados = [])
    {
        return $this->curl('POST', $url, $dados);
    }

}
