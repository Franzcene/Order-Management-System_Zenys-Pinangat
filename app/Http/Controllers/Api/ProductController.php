<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private function respond($data, $status)
    {
        $contentType = request()->header('Accept');

        // Handle XML response
        if ($contentType == 'application/xml') {
            $xml = new \SimpleXMLElement('<root/>');
            $this->arrayToXml($data, $xml);
            return response($xml->asXML(), $status)->header('Content-Type', 'application/xml');
        }

        // Default JSON response
        return response()->json($data, $status);
    }

    private function arrayToXml($data, &$xml)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'item' . $key;
                }
                $subnode = $xml->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                if (is_numeric($key)) {
                    $key = 'item' . $key;
                }
                $xml->addChild($key, htmlspecialchars((string) $value));
            }
        }
    }

    private function parseXmlRequest(Request $request)
    {
        $xmlContent = simplexml_load_string($request->getContent());
        return json_decode(json_encode($xmlContent), true); // Convert XML to associative array
    }

    public function index()
    {
        $products = Product::all();
        return $this->respond($products->toArray(), Response::HTTP_OK);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            Log::warning("Product with ID {$id} not found.");
            return $this->respond(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->respond($product->toArray(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        // Check if the request is in XML format
        if ($request->header('Content-Type') == 'application/xml') {
            $input = $this->parseXmlRequest($request);
        } else {
            $input = $request->all();
        }

        // Validate the input
        $request->merge($input); // Merge parsed input into the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        // Create the product
        $product = Product::create($request->all());

        return $this->respond($product->toArray(), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            Log::warning("Product with ID {$id} not found.");
            return $this->respond(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        // Check if the request is in XML format
        if ($request->header('Content-Type') == 'application/xml') {
            $input = $this->parseXmlRequest($request);
        } else {
            $input = $request->all();
        }

        // Validate the input
        $request->merge($input); // Merge parsed input into the request
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'quantity' => 'sometimes|required|integer',
        ]);

        // Update the product
        $product->update($request->all());

        return $this->respond($product->toArray(), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            Log::warning("Product with ID {$id} not found.");
            return $this->respond(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return $this->respond(null, Response::HTTP_NO_CONTENT);
    }
}
