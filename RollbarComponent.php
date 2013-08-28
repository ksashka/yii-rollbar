<?php
class RollbarComponent extends CApplicationComponent
{
	public $accessToken;
	public $environment;
	public $branch;
	public $batched;
	public $batchSize;
	public $timeout;
	public $logger;
	public $maxErrno;
	public $baseApiUrl;
	public $rootAlias = 'application';

	public function init() {
		Rollbar::init(array(
			'access_token' => $this->accessToken,
			'environment' => $this->environment,
			'branch' => $this->branch,
			'batched' => $this->batched,
			'batch_size' => $this->batchSize,
			'timeout' => $this->timeout,
			'logger' => $this->logger,
			'max_errno' => $this->maxErrno,
			'base_api_url' => $this->baseApiUrl,
			'root' => !empty($this->rootAlias) ? Yii::getPathOfAlias($this->rootAlias) : '',
		), false, false);

		parent::init();
	}
}
