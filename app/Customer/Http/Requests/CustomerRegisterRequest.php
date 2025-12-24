<?php

namespace App\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CustomerRegisterRequest extends FormRequest
{

    protected function prepareForValidation(): void
    {
        $this->merge([
            'document' => preg_replace('/\D/', '', $this->document ?? ''),
            'company_document' => preg_replace('/\D/', '', $this->company_document ?? ''),
            'zip_code' => preg_replace('/\D/', '', $this->zip_code ?? ''),
            'phone' => preg_replace('/\D/', '', $this->phone ?? ''),
            'telephone' => preg_replace('/\D/', '', $this->telephone ?? ''),
        ]);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'telephone' => ['required', 'string', 'max:20'],
            'document' => ['required', 'string', 'max:14', 'unique:users,document'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'corporate_name' => ['required', 'string', 'max:255'],
            'company_document' => ['required', 'string', 'size:14', 'unique:customers,document'],
            'company_email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'zip_code' => ['required', 'string', 'size:8'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:11'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],

            'erp_id' => ['required', 'integer', 'exists:erps,id'],
            'erp_url' => ['nullable', 'url', 'max:255'],
            'erp_token' => ['nullable', 'string', 'max:255'],
            'erp_app' => ['nullable', 'string', 'max:255'],

            'config_points_activation' => ['required', 'integer', 'min:0'],
            'config_points_recurring' => ['required', 'integer', 'min:0'],

            'config_cashback_percent' => ['required', 'integer', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'O nome do usuário é obrigatório.',
            'first_name.string' => 'O nome deve ser um texto válido.',
            'first_name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'last_name.required' => 'O sobrenome do usuário é obrigatório.',
            'last_name.string' => 'O sobrenome deve ser um texto válido.',
            'last_name.max' => 'O sobrenome não pode ter mais que 255 caracteres.',

            'email.required' => 'O e-mail do usuário é obrigatório.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está sendo utilizado por outro usuário.',

            'telephone.required' => 'O telefone/celular do usuário é obrigatório.',
            'telephone.max' => 'O telefone é muito longo.',

            'document.required' => 'O CPF do usuário é obrigatório.',
            'document.max' => 'O CPF deve ter no máximo 14 caracteres.',
            'document.unique' => 'Este CPF já está cadastrado no sistema.',

            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não confere.',

            'corporate_name.required' => 'A Razão Social da empresa é obrigatória.',
            'corporate_name.string' => 'A Razão Social deve ser um texto válido.',
            'corporate_name.max' => 'A Razão Social não pode ter mais que 255 caracteres.',

            'company_document.required' => 'O CNPJ da empresa é obrigatório.',
            'company_document.size' => 'O CNPJ deve conter exatamente 14 números.',
            'company_document.unique' => 'Este CNPJ já está cadastrado em nossa base.',

            'company_email.required' => 'O e-mail da empresa é obrigatório.',
            'company_email.email' => 'Informe um e-mail corporativo válido.',
            'company_email.max' => 'O e-mail da empresa é muito longo.',
            'company_email.unique' => 'Este e-mail empresarial já está cadastrado.',

            'zip_code.required' => 'O CEP é obrigatório.',
            'zip_code.size' => 'O CEP deve conter exatamente 8 números.',

            'address.required' => 'O endereço é obrigatório.',
            'address.string' => 'O endereço deve ser um texto válido.',
            'address.max' => 'O endereço não pode ter mais que 255 caracteres.',

            'phone.required' => 'O telefone da empresa é obrigatório.',
            'phone.min' => 'O telefone da empresa deve ter no mínimo 10 dígitos.',
            'phone.max' => 'O telefone da empresa deve ter no máximo 11 dígitos.',

            'logo.image' => 'O arquivo enviado deve ser uma imagem.',
            'logo.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou svg.',
            'logo.max' => 'A imagem da logo não pode ser maior que 2MB.',

            'erp_id.required' => 'É necessário selecionar um ERP.',
            'erp_id.exists' => 'O ERP selecionado não é válido.',

            'erp_url.url' => 'A URL de integração deve ser um endereço web válido (começando com http:// ou https://).',
            'erp_url.max' => 'A URL é muito longa.',

            'erp_token.string' => 'O token deve ser um texto válido.',

            'config_points_activation.required' => 'Defina a quantidade de pontos por ativação.',
            'config_points_activation.integer' => 'Os pontos de ativação devem ser um número inteiro.',
            'config_points_activation.min' => 'A pontuação por ativação não pode ser negativa.',

            'config_points_recurring.required' => 'Defina a quantidade de pontos recorrentes.',
            'config_points_recurring.integer' => 'Os pontos recorrentes devem ser um número inteiro.',
            'config_points_recurring.min' => 'A pontuação recorrente não pode ser negativa.',

            'config_cashback_percent.required' => 'Defina a porcentagem de cashback.',
            'config_cashback_percent.integer' => 'A porcentagem deve ser um número inteiro.',
            'config_cashback_percent.min' => 'A porcentagem de cashback não pode ser negativa.',
            'config_cashback_percent.max' => 'A porcentagem de cashback não pode ser maior que 100%.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
