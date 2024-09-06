<?php
namespace python;

/**
*/
class anthropic{
    /**
    * @return anthropic 
    */
    public static function import()
    {
        return \PyCore::import('anthropic');
    }
    public $DEFAULT_MAX_RETRIES = 2;

    public $AI_PROMPT = "\n\nAssistant:";
    public $HUMAN_PROMPT = "\n\nHuman:";
    public $__doc__ = null;
    public $__name = "AI_PROMPT";
    public $__name__ = "anthropic";
    public $__package__ = "anthropic";
    public $__title__ = "anthropic";
    public $__version__ = "0.34.2";

    public $APIConnectionError = null;
    public $APIError = null;
    public $APIResponse = null;
    public $APIResponseValidationError = null;
    public $APIStatusError = null;
    public $APITimeoutError = null;
    public $Anthropic = null;
    public $AnthropicBedrock = null;
    public $AnthropicError = null;
    public $AnthropicVertex = null;
    public $AsyncAPIResponse = null;
    public $AsyncAnthropic = null;
    public $AsyncAnthropicBedrock = null;
    public $AsyncAnthropicVertex = null;
    public $AsyncClient = null;
    public $AsyncMessageStream = null;
    public $AsyncMessageStreamManager = null;
    public $AsyncPromptCachingBetaMessageStream = null;
    public $AsyncPromptCachingBetaMessageStreamManager = null;
    public $AsyncStream = null;
    public $AuthenticationError = null;
    public $BadRequestError = null;
    public $BaseModel = null;
    public $Client = null;
    public $ConflictError = null;
    public $ContentBlockStopEvent = null;
    public $DEFAULT_CONNECTION_LIMITS = null;
    public $DEFAULT_TIMEOUT = null;
    public $DefaultAsyncHttpxClient = null;
    public $DefaultHttpxClient = null;
    public $InputJsonEvent = null;
    public $InternalServerError = null;
    public $MessageStopEvent = null;
    public $MessageStream = null;
    public $MessageStreamEvent = null;
    public $MessageStreamManager = null;
    public $NOT_GIVEN = null;
    public $NoneType = null;
    public $NotFoundError = null;
    public $NotGiven = null;
    public $PermissionDeniedError = null;
    public $PromptCachingBetaMessageStream = null;
    public $PromptCachingBetaMessageStreamManager = null;
    public $ProxiesTypes = null;
    public $RateLimitError = null;
    public $RequestOptions = null;
    public $Stream = null;
    public $TextEvent = null;
    public $Timeout = null;
    public $Transport = null;
    public $UnprocessableEntityError = null;
    public $__locals = null;
    public $__path__ = null;
    public $_base_client = null;
    public $_client = null;
    public $_compat = null;
    public $_constants = null;
    public $_exceptions = null;
    public $_files = null;
    public $_legacy_response = null;
    public $_models = null;
    public $_qs = null;
    public $_resource = null;
    public $_response = null;
    public $_streaming = null;
    public $_tokenizers = null;
    public $_types = null;
    public $_utils = null;
    public $_version = null;
    public $lib = null;
    public $resources = null;
    public $types = null;

    public function _setup_logging()
    {
    }

    public function file_from_path($path)
    {
    }

}
