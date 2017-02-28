<?php

namespace Utils\Random;

class UuidGenerator {
	public static function generate($algo) {
		return hash($algo, microtime());
	}
}