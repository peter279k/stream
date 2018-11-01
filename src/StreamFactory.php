<?php declare(strict_types=1);

/**
 * It's free open-source software released under the MIT License.
 *
 * @author Anatoly Fenric <anatoly@fenric.ru>
 * @copyright Copyright (c) 2018, Anatoly Fenric
 * @license https://github.com/sunrise-php/stream/blob/master/LICENSE
 * @link https://github.com/sunrise-php/stream
 */

namespace Sunrise\Stream;

/**
 * Import classes
 */
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * StreamFactory
 */
class StreamFactory implements StreamFactoryInterface
{

	/**
	 * {@inheritDoc}
	 *
	 * @link http://php.net/manual/en/wrappers.php.php#wrappers.php.memory
	 */
	public function createStream(string $content = '') : StreamInterface
	{
		$resource = \fopen('php://temp', 'r+b');

		\fwrite($resource, $content);
		\rewind($resource);

		return new Stream($resource);
	}

	/**
	 * Creates a stream from the request body
	 *
	 * @return StreamInterface
	 *
	 * @link http://php.net/manual/en/wrappers.php.php#wrappers.php.memory
	 * @link http://php.net/manual/en/wrappers.php.php#wrappers.php.input
	 */
	public function createStreamFromRequestBody() : StreamInterface
	{
		$resource = \fopen('php://temp', 'r+b');

		\stream_copy_to_stream(\fopen('php://input', 'rb'), $resource);

		\rewind($resource);

		return new Stream($resource);
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws Exception\UnopenableStreamException If the given file does not open
	 */
	public function createStreamFromFile(string $filename, string $mode = 'r') : StreamInterface
	{
		// If the open fails, an error of level E_WARNING is generated.
		// You may use @ to suppress this warning.
		// http://php.net/manual/en/function.fopen.php
		$resource = @ \fopen($filename, $mode);

		if (false === $resource)
		{
			throw new Exception\UnopenableStreamException(
				\sprintf('Unable to open file "%s" in mode "%s"', $filename, $mode)
			);
		}

		return new Stream($resource);
	}

	/**
	 * {@inheritDoc}
	 */
	public function createStreamFromResource($resource) : StreamInterface
	{
		return new Stream($resource);
	}
}
