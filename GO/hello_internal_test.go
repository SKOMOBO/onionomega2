package main

import "testing"

func TestSpeak(t *testing.T) {
	if Speak() != "hello" {
		t.Error("Expected hello")
	}
}
