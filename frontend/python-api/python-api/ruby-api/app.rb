require 'sinatra'
require 'json'

set :bind, '0.0.0.0'
set :port, ENV['PORT'] || 4567

before do
  headers 'Access-Control-Allow-Origin' => '*'
end

get '/api/promocion' do
  content_type :json
  { titulo: "Especial de la Semana", descuento: 20 }.to_json
end
